<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\test;
use Illuminate\Support\Facades\Mail;

class MailboxController extends Controller
{
    public function index(Request $request)
    {
    	$this->setActive('mailbox');
    	$this->setTitle('mailbox');

    	return view('admin.mailbox.index', $this->data);
    }

    public function compose(Request $request)
    {
    	$this->setActive('mailbox');
    	$this->setTitle('mailbox');

    	Mail::to('fk_joglo@yahoo.com')->send(new test('aa'));

    	// return view('admin.mailbox.compose', $this->data);
    }


    public function add(Request $request)
    {
    	
    	// echo urldecode($ea);
    }
}
