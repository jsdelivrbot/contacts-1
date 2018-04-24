<?php

namespace App\Http\Controllers\Web;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactRepository;
use Illuminate\Http\Response;
use Log;

class ContactController extends Controller
{

    /**
     * @author Musavengana Zirebwa <musaz01@gmail.com>
     * @param ContactRepostory $contactsRepository
     * @return Response
     */
    public function index(ContactRepository $contactsRepository, Request $request)
    {
        $contacts = $contactsRepository->getAllContacts();
        return view('welcome', compact('contacts'));
    }
}
