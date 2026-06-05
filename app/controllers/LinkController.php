<?php

namespace App\Controllers;

use App\Models\Channel;
use App\Models\Link;
use App\Models\SubChannel;
use Legato\Framework\Request;
use Legato\Framework\Validator\Validator;

class LinkController extends BaseController
{
    public function index()
    {
        $links = Link::where('approved', 1)->orderBy('id', 'desc')->paginated(12);

        return view('links/index', compact('links'));
    }

    public function create()
    {
        $channels = Channel::where('archived', 0)->get();

        return view('links/create', compact('channels'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => ['required' => true, 'max' => 200, 'string' => true],
            'url' => ['required' => true, 'max' => 500],
            'description' => ['required' => true, 'max' => 1000, 'string' => true],
            'channel_id' => ['required' => true, 'numeric' => true],
            'g-recaptcha-response' => ['required' => true],
        ];

        $validator = new Validator($request->all(), $rules);

        $response = \App\classes\Recaptcha::verify([
            'secret' => config('RECAPTCHA_SECRET'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->clientIp(),
        ]);

        if ($validator->fail() || is_array($response)) {
            $validation_errors = $validator->error()->get();

            is_array($response) && count($response)
                ? $errors = array_merge($validation_errors, $response)
                : $errors = $validation_errors;

            return view('links/create', compact('errors'));
        }

        Link::create([
            'user_id' => user()->id,
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'description' => $request->input('description'),
            'channel_id' => $request->input('channel_id'),
            'sub_channel_id' => $request->input('sub_channel_id'),
            'approved' => 0,
        ]);

        flash('success', 'Your link has been submitted for review. Thank you!');

        return redirectTo('/links');
    }

    public function show($id)
    {
        $link = Link::find($id);

        if (!$link || !$link->approved) {
            return view('errors/404');
        }

        return view('links/show', compact('link'));
    }

    public function subChannels(Request $request)
    {
        $channelId = $request->input('channel_id');
        $subchannels = SubChannel::where('channel_id', $channelId)
            ->where('archived', 0)
            ->get();

        return json_encode($subchannels);
    }
}
