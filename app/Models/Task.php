<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "Tasks";
//  id | title | description | status | priority | due_date | project_id | created_by | assigned_to | created_at | updated_at
    protected $fillable = ["title",
                        "description",
                        "status",
                        "priority",
                        "due_date",
                        "project_id",
                        "created_by",
                        "assigned_to"];
    
}
