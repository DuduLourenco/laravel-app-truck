<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Usuario::create([
            'nmUsuario'=> 'Joao',
            'cdCpfUsuario'=> '49587380886',
            'dtNascimentoUsuario'=> '2000-09-08',
            'nrTelefoneUsuario'=> '13981930999',
            'dsEmailUsuario'=> 'vmfs2000@gmail.com',
            'nmSenhaUsuario'=> '12345678'
        ]);
    }
}
