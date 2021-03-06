<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function createAgent(Request $request) {
        $this->validate($request, [
            'name'      => 'required',
            'password'  => 'required',
            'phone_no'  => 'required|unique:agents',
            'username'  => 'required',
        ]);
        $data = [
            'name'              => $request->name,
            'password_hash'     => Crypt::encryptString($request->password),
            'phone_no'          => $request->phone_no,
            'username'          => $request->username,
        ];   
        // creating agent object to store data since password_hash is a hidden field,
        // thus cannot be assigned directly using create($data)  
        $agent = new Agent($data);    
        $agent->password_hash = $data["password_hash"];
        $agent->save();
        return response()->json(['message' => 'Agent registered successfully'], 201);
    }

    public function listAgents()
    {
        $agents = Agent::all();
        return view('pages/agents', ['agents' => $agents, 'path'=>'agents', 'message' => 'null']);
    }

    public function updateAgent($id, Request $request) {
        $agent = Agent::findOrFail($id);
        if($agent->phone_no != $request->phone_no) {
            $this->validate($request, [
                'name'              => 'required',
                'phone_no'          => 'required|unique:users',
                'username'          => 'required',
            ]);
        }
        else {
            $this->validate($request, [
                'name'              => 'required',
                'phone_no'          => 'required',
                'username'          => 'required',
            ]);
        }       
        $agent->update($request->all());
        return response()->json(['message' => 'Agent updated successfully'], 200);
    }

    public function deleteAgent($id)
    {
        $result = Agent::findOrFail($id)->delete();
        return response()->json(['message' => 'Agent deleted successfully'], 200);
    }
    
}