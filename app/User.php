<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contacts()
    {
        return $this->belongsToMany('App\User', 'contact_user', 'user_id', 'contact_id')->withTimestamps();
    }

    public function theContacts()
    {
        return $this->belongsToMany('App\User', 'contact_user', 'contact_id', 'user_id')->withTimestamps();
    }

    public function phones()
    {
        return $this->hasMany('App\Phone');
    }

//     public function add_contact($contact_id)
// {
//     dd($contact_id);
//     // $this->contacts()->attach($contact_id);   // add friend
//     // $contact = \App\User::find($contact_id);       // find your friend, and...
//     // $contact->contacts()->attach($this->id);  // add yourself, too
// }
}
