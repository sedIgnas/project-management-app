<?php

namespace App\Repositories\Group;

use App\Models\Group;

class GroupRepository
{

  private Group $group;

  public function __construct(Group $group)
  {
    $this->group = $group;
  }

  public function getAllGroups()
  {
    return $this->group->all();
  }
}
