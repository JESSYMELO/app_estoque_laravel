<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::insert('insert into produtos(descricao, quantidade, valor, data_vencimento) VALUES (?,?,?,?)', array('Arroz', 10,10.50,'2018-12-01'));
        DB::insert('insert into produtos(descricao, quantidade, valor, data_vencimento) VALUES (?,?,?,?)', array('Feijão', 8,8.00,'2018-08-24'));
        DB::insert('insert into produtos(descricao, quantidade, valor, data_vencimento) VALUES (?,?,?,?)', array('Óleo', 12,5.99,'2018-10-01'));
        DB::insert('insert into produtos(descricao, quantidade, valor, data_vencimento) VALUES (?,?,?,?)', array('Farinha', 20,3.50,'2018-10-12'));

    }
}
