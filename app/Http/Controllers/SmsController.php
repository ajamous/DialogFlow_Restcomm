<?php

namespace App\Http\Controllers;

use App\DialogFlowDetectIntent;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SmsController extends Controller
{

    public function detectAgent(Request $request, $agentName)
    {
        // list key files that match the requested Agent
        $agentsKey = glob(base_path($agentName . '-' . '*'));
        if (count($agentsKey) == 1) {
            // parse the path to get the file name
            // filename MUST follow the pattern "PROJECT_ID.json"
            $parts = pathinfo(array_pop($agentsKey));
            $projectId = $parts['filename'];
            $response = DialogFlowDetectIntent::detectIntent($projectId, $request->input('sms'), $request->user()->id);
            return ['response' => $response];
        }
        return  response()->json([
            'response' => 'Agent not found'
        ])->setStatusCode(Response::HTTP_BAD_REQUEST);
    }

}
