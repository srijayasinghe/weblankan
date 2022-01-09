<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserInterface
{
    public function login(Request $request);

    public function create(Request $request);

    public function update(Request $request);

    public function delete( $id);

    public function view($id);

    public function list();
}
