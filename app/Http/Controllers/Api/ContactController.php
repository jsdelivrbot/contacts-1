<?php

namespace App\Http\Controllers\Api;

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
    public function index(ContactRepository $contactsRepository)
    {
        $contacts = $contactsRepository->getAllContacts();
        return response()->json($contacts)->setStatusCode(200);
        //return view('welcome', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ContactRepository $contactsRepository)
    {
        $this->validateContact($request);

        $contact = $contactsRepository->createContact($request->all());

        return response($contact)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
     public function show(ContactRepository $contactRepository, $contactId)
     {
         $contact = $contactRepository->findById($contactId);
         if($contact){
            return response()->json($contact)->setStatusCode(
                Response::HTTP_OK,
                Response::$statusTexts[Response::HTTP_OK]
            );
         }else{
            return response()->json()->setStatusCode(
                Response::HTTP_NOT_FOUND,
                Response::$statusTexts[Response::HTTP_NOT_FOUND]
            );
         }
        
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactRepository $contactsRepository, $contact)
    {
        $this->validateContact($request);
        $contact = $contactsRepository->updateContact($contact, $request->all());
        Log::info('Updated region contact : '.$contact);
        return response()->json($contact)->setStatusCode(
            Response::HTTP_OK,
            Response::$statusTexts[Response::HTTP_OK]
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactRepository $contactRepository, $contactId)
    {
        $contactRepository->deleteContact($contactId);
        return response()->json()->setStatusCode(
            Response::HTTP_NOT_FOUND,
            Response::$statusTexts[Response::HTTP_NOT_FOUND]
        );
    }

    /**
     * @param Request $request
     */
    public function validateContact(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'telephone' => 'numeric|required|min:10',
            'email' => 'required|email|unique:contacts',
            'contact_type' => 'required',
        ]);
    }
}
