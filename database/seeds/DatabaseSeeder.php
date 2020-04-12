<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /* Criação do administrador */
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin',
            'password' => bcrypt('admin'),
            'profile_type' => '1',
        ]);

        /* USUARIO CLIENTE */
        DB::table('users')->insert([
            'name' => 'Cliente',
            'email' => 'cliente',
            'password' => bcrypt('cliente'),
            'profile_type' => '2',
        ]);

        /* USUARIO FUNCIONARIO */
        DB::table('users')->insert([
            'name' => 'Funcionario',
            'email' => 'funcionario',
            'password' => bcrypt('funcionario'),
            'profile_type' => '3',
        ]);

        // Seed do cliente.
        for ($i = 0; $i < 4; $i++) {
            DB::table('tickets')->insert([
                'status' => '0',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec erat lacus,
                lacinia vitae justo id, pretium elementum lacus. Etiam ac scelerisque tortor.
                Pellentesque aliquam molestie lorem, at porta leo aliquam cursus.
                Aenean vitae diam non nibh tincidunt laoreet.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                Vivamus vitae mi sit amet orci sollicitudin laoreet at id tortor.
                Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                per inceptos himenaeos. Vestibulum sodales imperdiet vehicula.',
                'client_id' => '2',
            ]);
        }

        // Seed de comentarios do cliente.
        for ($i = 0; $i < 7; $i++) {
            DB::table('comments')->insert([
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non iste voluptatem neque veritatis, recusandae deleniti sint blanditiis.',
                'ticket_id' => '1',
                'user_id' => '2',
            ]);
        }

        for ($i = 0; $i < 1; $i++) {
            DB::table('comments')->insert([
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non iste voluptatem neque veritatis, recusandae deleniti sint blanditiis.',
                'ticket_id' => '1',
                'user_id' => '3',
            ]);
        }

        /* SEED's Randomicos */

        // Usuarios.
        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('123456'),
            ]);
        }

        // Chamados.
        for ($i = 0; $i < 50; $i++) {
            DB::table('tickets')->insert([
                'status' => '0',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec erat lacus,
                lacinia vitae justo id, pretium elementum lacus. Etiam ac scelerisque tortor.
                Pellentesque aliquam molestie lorem, at porta leo aliquam cursus.
                Aenean vitae diam non nibh tincidunt laoreet.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                Vivamus vitae mi sit amet orci sollicitudin laoreet at id tortor.
                Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                per inceptos himenaeos. Vestibulum sodales imperdiet vehicula.',
                'client_id' => '2',
            ]);
        }

        // Comentarios.
        for ($i = 0; $i < 5; $i++) {
            DB::table('comments')->insert([
                'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non iste voluptatem neque veritatis, recusandae deleniti sint blanditiis.',
                'ticket_id' => '1',
                'user_id' => '2',
            ]);
        }
    }
}
