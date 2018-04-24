<?php
/**
 * Created by PhpStorm.
 * User: musavenganazirebwa
 * Date: 16/04/2018
 * Time: 12:49 PM
 */

namespace App\Models;
use DB;
use Illuminate\Support\Collection;

class ContactRepository
{
    /**
     * @author Musavengana Zirebwa <musaz01@gmail.com>
     * @param int $id
     * @return Contact
     */
    public function findById(int $id) : Contact
    {
        return Contact::findOrFail($id);
    }

    /**
     * @author Musavengana Zirebwa <musaz01@gmail.com>
     * @return Collection|Contact[]
     */
    public function getAllContacts() : Collection
    {
        return Contact::all();
    }

    /**
     * @author Musavengana Zirebwa <musaz01@gmail.com>
     * @param array $input
     * @return Contact
     */
    public function createContact(array $input) : Contact
    {
        $contact = Contact::create($input);
        return $contact;
    }

    /**
     * @author Musavengana Zirebwa <musaz01@gmail.com>
     * @param int $contactId
     * @param array $input
     * @return Contact
     */
    public function updateContact(int $contactId, array $input)
    {
        $contact = Contact::findOrFail($contactId);
        $contact->update($input);
        return $contact;
    }

    /**
     * @author Musavengana Zirebwa <musaz01@gmail.com>
     * @param int $contactId
     */
    public function deleteContact(int $contactId)
    {
        $contact = Contact::findOrFail($contactId);
        $contact->delete();
    }
}