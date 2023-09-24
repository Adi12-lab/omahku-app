<?php

namespace App\Http\Controllers\Frontend;

use App\Events\MessageDelivered;
use App\Models\Agent;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    //private $user_id; setiap request independen tidak memiliki pengetahuan sebelumnya

    public function index(Request $request) {
        $agents = Agent::with(["user"])->withCount("properties")->where("status", 1);

        if($request->has("search")) {
            $agents = $agents->where("name",  'like', '%' . $request->get("search") . '%');
        }

        $agents = $agents->paginate(6);

        // dd($agents);
        return view("frontend.agents", compact("agents"));
    }

    public function view($agent_id) {
        $agent = Agent::with(["properties", "properties.propertyImages"])->firstWhere("id", $agent_id);
        $categories = Category::withCount("properties")->get();
        return view("frontend.agentDetails", compact("agent","categories"));
    }

    public function message(Request $request) {
        
        $payload = $request->validate([
            "user_id" => "required|numeric",
            "sender_name" => "required",
            "sender_phone" => "required|numeric",
            "sender_email" => "email:rfc,dns",
            "subject" => "required|string",
            "sender_message" => "required|string|min:10",
        ]);

        $message = new Message;
        $message->receiver_id = $payload["user_id"];
        $message->name = $payload["sender_name"];
        $message->email = $payload["sender_email"];
        $message->phone = $payload["sender_phone"];
        $message->subject = $payload["subject"];
        $message->message = $payload["sender_message"];
        $message->save();
        
        
        broadcast(new MessageDelivered($payload, $payload["user_id"]))->toOthers();
        return response("Berhasil Broadcast");
    }


}
