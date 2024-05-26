<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAll() {
        try {
            $userRepo = (new UserRepository)->all();
            return parent::success($userRepo);
        } catch (\Throwable $th) {
            return parent::error($th->getMessage(), 500, $th);
        }
    }

    public function insert(UserRequest $request) {
        try {
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            $userRepo = (new UserRepository)->create($data);
            return parent::success($userRepo, 'User created successfully');
        } catch (\Throwable $th) {
            return parent::error($th->getMessage(), 500, $th);
        }
    }

    public function getOne($id) {
        try {
            $userRepo = (new UserRepository)->find($id);
            if (!$userRepo) {
                return parent::error('User not found');
            }
            return parent::success($userRepo);
        } catch (\Throwable $th) {
            return parent::error($th->getMessage(), 500, $th);
        }
    }

    public function update(UserRequest $request, $id) {
        try {
            $userRepo = (new UserRepository)->find($id);
            if (!$userRepo) {
                return parent::error('User not found');
            }
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            $userRepo = (new UserRepository)->update($id, $data);
            return parent::success($userRepo, 'User updated successfully');
        } catch (\Throwable $th) {
            return parent::error($th->getMessage(), 500, $th);
        }
    }

    public function delete($id) {
        try {
            $userRepo = (new UserRepository)->find($id);
            if (!$userRepo) {
                return parent::error('User not found');
            }
            $userRepo = (new UserRepository)->delete($id);
            return parent::success($userRepo, 'User deleted successfully');
        } catch (\Throwable $th) {
            return parent::error($th->getMessage(), 500, $th);
        }
    }
}
