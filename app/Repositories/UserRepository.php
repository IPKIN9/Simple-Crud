<?php

namespace App\Repositories;

use App\Contract\Repositories\UserRepositoryContract;
use App\Models\User;

class UserRepository implements UserRepositoryContract {
    public function all() {
        return User::all();
    }

    public function find($id) {
        return User::find($id);
    }

    public function create(array $data) {
        return User::create($data);
    }

    public function update($id, array $data) {
        return User::find($id)->update($data);
    }

    public function delete($id) {
        return User::find($id)->delete();
    }
}