<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 
    ];

      public function hobby() {
        return $this->hasOne('App\Hobby','user_id');
      }
     
      public function get_hobbies_names() {
        $hobbies_names = DB::getSchemaBuilder()->getColumnListing('hobbies');
        return array_diff($hobbies_names, ['user_id','created_at','updated_at']);
      }

      public function get_user_hobbies( $email ) {
        $user = $this->get_user_by_email( $email );
        $hobbies  = new Hobby();
        return $hobbies->where('user_id', $user->id)->first();
      }

      public function get_all_other_hobbies( $email ) {
        $user = $this->get_user_by_email( $email );
        $hobbies  = new Hobby();
        return $hobbies->whereNotIn('user_id', [$user->id])->get();
      }

      public function get_user_name( $id ) {
        return $this->where('id',$id)->first()->name;
      }
      
      private function get_user_by_email( $email ) {
        return $this->where('email', $email)->first();
      }
}
   
class Hobby extends Model{

  protected $table = 'hobbies';
  protected $fillable = array('user_id','swim','bicykel','run','tourism','climbing');
  public function user() {
    return $this->belongsTo('App\User','id');
  }
}