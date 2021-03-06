<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'alumno' => [
        'title' => 'Alumnos',

        'actions' => [
            'index' => 'Alumnos',
            'create' => 'New Alumno',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            'Telefono' => 'Telefono',
            'Direccion' => 'Direccion',
            'Edad' => 'Edad',
            'FechaNacimiento' => 'FechaNacimiento',
            
        ],
    ],

    'craftableproyecto' => [
        'title' => 'Craftableproyecto',

        'actions' => [
            'index' => 'Craftableproyecto',
            'create' => 'New Craftableproyecto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];