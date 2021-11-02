<?php
namespace App\Services;
use App\Traits\ExternalServices;
use Illuminate\Http\Request;
use App\Service;
use App\Order;
class PaypalService 
{
    use ExternalServices;
    protected $baseUri; 
    protected $clientId; 
    protected $clientSecret; 

    public function __construct(){
        $this->baseUri=settings()->paypal_base_uri;
        $this->clientId=settings()->paypal_client_id;
        $this->clientSecret=settings()->paypal_client_secret;
    }

    public function resolveAuthorization(&$queryParams,&$formParams,&$headers){
        $headers['Authorization']=$this->resolveAccessToken();
    }
    public function decodeResponse($response){
        return json_decode($response);
    }
    public function resolveAccessToken(){
        $credentials=base64_encode($this->clientId.':'.$this->clientSecret);
        return 'Basic ' .$credentials;
    }

    public function handlePayment(Request $request){
        $service=Service::find(session('service_id'));
        $order=$this->create_order(discount_price($service->price,$service->discount));
        $orderLinks=collect($order->links);
        $approve=$orderLinks->where('rel','approve')->first();
        session()->put('approvalId',$order->id);
        return redirect($approve->href);
    }
    public function handleApproval(){
        if(session()->has('approvalId')){
            $approvalId=session()->get('approvalId');
            $payment=$this->capturePayment($approvalId);
            $name=$payment->payer->name->given_name; 
            $payment=$payment->purchase_units[0]->payments->captures[0]->amount;
            $amount=$payment->value; 
            // making  an action
            $service_id=session('service_id');
            $user_id=auth()->check()?auth()->user()->id:null;
            $email=session('email');
            $url=session('url');
            $instagram_username=session('instagram_username');
            Order::create([
                'service_id'=>$service_id,
                'user_id'=>$user_id,
                'payment_method'=>'paypal',
                'username'=>$name,
                'email'=>$email,
                'price'=>$amount,
                'url'=>$url,
                'instagram_username'=>$instagram_username
            ]);
            session()->forget('email');
            session()->forget('instagram_username');
            session()->forget('url');
            session()->forget('service_id');
            session()->flash('success','Your order has been placed,Thank You For choosing '.settings()->site_name);
            if(auth()->check()){
                return redirect('/home');
            }else{
                return redirect('/');

            }
        }else{
            return redirect('/');
        }
    }

    public function create_order($value){
        return $this->makeRequest(
            'POST',
            '/v2/checkout/orders',
            [],
            
                [
                "intent"=> "CAPTURE",
                "purchase_units"=> [
                    [
                    "amount"=> [
                        "currency_code"=>"USD",
                        "value"=> (string)$value
                    ]
                    ]
                    ],
                    'headers' => [
            'Accept' => 'application/json',
            'Accept-Language' => 'en_US',
            'Content-Type' => 'application/json',
                    ],
                    'application_context'=>[
                            'return_url'=>route('approved'),
                            'cancel_url'=>route('cancelled'),
                        ]
                ],
           
            [],
        
            $isJsonRequest=true
        );
    }

    public function capturePayment($approvalId){
        return $this->makeRequest(
            'POST',
            '/v2/checkout/orders/'.$approvalId.'/capture',
            [],
            [],
            [
                'Content-Type'=>'application/json'
            ]
        );
    }


}