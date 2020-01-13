<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';
  protected $fillable = ["name","vision","message","goal","user_id"];

  /**
  * @return \Illuminate\Database\Eloquent\Relations\HasMany
  */

  public function projectTeam()
  {
      return $this->hasMany('App\Team');
  }
    public function projectCompetitors()
    {
        return $this->hasMany('App\Competitors');
    }
    public function projectTarget()
    {
        return $this->hasMany('App\Target');
    }
    public function projectPlan()
    {
        return $this->hasMany('App\Plan');
    }
    public function projectElements()
    {
        return $this->hasMany('App\Elements');
    }
    public function projectOutlay()
    {
        return $this->hasMany('App\Outlay');
    }
  /**
  * @return \Illuminate\Database\Eloquent\Relations\belongsTo
  */
  public function user()
  {
      return $this->belongsTo('App\User','user_id');
  }





}
