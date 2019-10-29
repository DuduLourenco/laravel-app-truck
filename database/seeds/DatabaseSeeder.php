<?php

use Illuminate\Database\Seeder;
use App\Usuario;
use App\Veiculo;
use App\MarcaVeiculo;
use App\ModeloVeiculo;
use App\Viagem;
use App\Gasto;

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
        $todayh = getdate();
        $d = $todayh['mday'];
        $m = $todayh['mon'];
        $y = $todayh['year'];

        MarcaVeiculo::create([
            'nmMarca'=>'Mercedes'
        ]);
        MarcaVeiculo::create([
            'nmMarca'=>'Scania'
        ]);
        MarcaVeiculo::create([
            'nmMarca'=>'Volvo'
        ]);
        ModeloVeiculo::create([
            'nmModelo'=>'Atego 2425',
            'idMarca'=>1,
        ]);
        ModeloVeiculo::create([
            'nmModelo'=>'R440',
            'idMarca'=>2,
        ]);
        ModeloVeiculo::create([
            'nmModelo'=>'VM',
            'idMarca'=>3,
        ]);

        ModeloVeiculo::create([
            'nmModelo'=>'FH',
            'idMarca'=>3,
        ]);
        ModeloVeiculo::create([
            'nmModelo'=>'Accelo 815',
            'idMarca'=>1,
        ]);
        for ($i=0; $i < 20; $i++) {
            $gastos=[];
            $valor=0;
            $viagens=[];
            $gastoT=0;
            for ($k=0; $k < 10; $k++) {
                $gasto=[
                    'dsTipo'=>$this->randomGasto(),
                    'dsValor'=>rand(100, 500),
                    'idUsuario'=>$i+1,
                    'dtGasto'=> $this->randomDateInRange(new DateTime('2019-01-01'), new DateTime($y.'-'.$m.'-'.$d))
                ];
                $valor-=$gasto['dsValor'];
                array_push($gastos,$gasto);
            }
            for ($m=0; $m <5 ; $m++) {
                $gasto=rand(0,3000);
                $ganhos=rand(0,3000);
                $lucro = $gasto-$ganhos;
                $gastoT-=$gasto*0.2;
                $viagem=[
                    'dsOrigemLat'=>rand(0,100),
                    'dsOrigemLng'=>rand(0,100),
                    'dsDestinoLat'=>rand(0,100),
                    'dsDestinoLng'=>rand(0,100),
                    'dsDistancia'=>rand(0,100),
                    'dsTempo'=>rand(0,100),
                    'dtPrazo'=> $this->randomDateInRange(new DateTime('2018-01-01'), new DateTime('2019-10-10')),
                    'hrPrazo'=>date("H:i",$this->randomDateInRange(new DateTime('2000-01-01'), new DateTime('2019-01-01'))->getTimestamp()),
                    'dsGastos'=>$gasto,
                    'dsValor'=>$ganhos,
                    'dsLucro'=>$lucro,
                    'dsStatus'=>"Feita",
                    'idUsuario'=>$i+1,
                    'idVeiculo'=>($i*2)+rand(1,2)
                ];

                array_push($viagens,$viagem);
            }
            Usuario::create([
                'nmUsuario'=> $this->randomName(),
                'cdCpfUsuario'=> $this->cpfRandom(),
                'dtNascimentoUsuario'=>  $this->randomDateInRange(new DateTime('1900-01-01'), new DateTime($y.'-'.$m.'-'.$d)),
                'nrTelefoneUsuario'=> rand(11111111111,99999999999),
                'dsEmailUsuario'=> rand(0, 9000).'@'.rand(0, 90).'mail.com',
                'nmSenhaUsuario'=> '12345678',
                'dsValorCofrinho'=>$gastoT-$valor
            ]);
            for ($w=0; $w <10 ; $w++) {
                Gasto::create(
                    $gastos[$w]
                );
            }

            Veiculo::create([
                'idModelo'=>rand(1,5),
                'idUsuario'=>$i+1,
                'nmPlacaVeiculo'=>"AAA-".rand(111, 999),
                'anoVeiculo'=> rand(1990,$y),
                'dsConsumoVeiculo'=>rand(1,20)
                ]);
            Veiculo::create([
                    'idModelo'=>rand(1, 5),
                    'idUsuario'=>$i+1,
                    'nmPlacaVeiculo'=>"AAA-".rand(111, 999),
                    'anoVeiculo'=> rand(1990,$y),
                    'dsConsumoVeiculo'=>rand(1,20)
            ]);

            for ($j=0; $j <5 ; $j++) {

                Viagem::create(
                    $viagens[$j]
                );
                Viagem::create([
                    'dsOrigemLat'=>rand(0,100),
                    'dsOrigemLng'=>rand(0,100),
                    'dsDestinoLat'=>rand(0,100),
                    'dsDestinoLng'=>rand(0,100),
                    'dsDistancia'=>rand(0,100),
                    'dsTempo'=>rand(0,100),
                    'dtPrazo'=> $this->randomDateInRange(new DateTime('2015-01-01'), new DateTime('2019-10-10')),
                    'hrPrazo'=>date("H:i",$this->randomDateInRange(new DateTime('2000-01-01'), new DateTime('2019-01-01'))->getTimestamp()),
                    'dsGastos'=>$gasto,
                    'dsValor'=>$ganhos,
                    'dsLucro'=>$lucro,
                    'dsStatus'=>"Feita",
                    'idUsuario'=>$i+1,
                    'idVeiculo'=>($i*2)+rand(1,2)
                ]);

                Viagem::create([
                    'dsOrigemLat'=>rand(0,100),
                    'dsOrigemLng'=>rand(0,100),
                    'dsDestinoLat'=>rand(0,100),
                    'dsDestinoLng'=>rand(0,100),
                    'dsDistancia'=>rand(0,100),
                    'dsTempo'=>rand(0,100),
                    'dtPrazo'=> $this->randomDateInRange(new DateTime('2019-09-28'), new DateTime('2019-10-10')),
                    'hrPrazo'=>date("H:i",$this->randomDateInRange(new DateTime('2000-01-01'), new DateTime('2019-01-01'))->getTimestamp()),
                    'dsGastos'=>$gasto,
                    'dsValor'=>$ganhos,
                    'dsLucro'=>$lucro,
                    'dsStatus'=>"Feita",
                    'idUsuario'=>$i+1,
                    'idVeiculo'=>($i*2)+rand(1,2)
                ]);
            }
        }
    }

    function randomDateInRange(DateTime $start, DateTime $end) {
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $randomDate = new DateTime();
        $randomDate->setTimestamp($randomTimestamp);
        return $randomDate;
    }

    function randomName() {
        $nomes = array(
            'Juan',
            'Luis',
            'Pedro',
            'Enzo Gabriel ',
            'Miguel ',
            'Arthur' ,
            'João Miguel ',
            'Maria Eduarda ',
            'Maria Clara',
            'Heitor' ,
            'Pedro Henrique'

        );
        $sobrenomes = array(
            'Silva',
            'Souza',
            'Costa',
            'Santos',
            'Oliveira',
            'Pereira',
            'Rodrigues',
            'Almeida'

        );
        return $nomes[rand ( 0 , count($nomes) -1)]." ".$sobrenomes[rand ( 0 , count($sobrenomes) -1)];
    }

    function randomGasto() {
        $gasto = array(
            'Combustível',
            'Manutenção',
            'Troca de Óleo',
            'Alimentação',
            'Estadia'

        );
        return $gasto[rand ( 0 , count($gasto) -1)];
    }


    public static function cpfRandom($mascara = "1") {
        $n1 = rand(0, 9);
        $n2 = rand(0, 9);
        $n3 = rand(0, 9);
        $n4 = rand(0, 9);
        $n5 = rand(0, 9);
        $n6 = rand(0, 9);
        $n7 = rand(0, 9);
        $n8 = rand(0, 9);
        $n9 = rand(0, 9);
        $d1 = $n9 * 2 + $n8 * 3 + $n7 * 4 + $n6 * 5 + $n5 * 6 + $n4 * 7 + $n3 * 8 + $n2 * 9 + $n1 * 10;
        $d1 = 11 - (self::mod($d1, 11) );
        if ($d1 >= 10) {
            $d1 = 0;
        }
        $d2 = $d1 * 2 + $n9 * 3 + $n8 * 4 + $n7 * 5 + $n6 * 6 + $n5 * 7 + $n4 * 8 + $n3 * 9 + $n2 * 10 + $n1 * 11;
        $d2 = 11 - (self::mod($d2, 11) );
        if ($d2 >= 10) {
            $d2 = 0;
        }
        $retorno = '';
        if ($mascara == 1) {
            $retorno = '' . $n1 . $n2 . $n3 . "." . $n4 . $n5 . $n6 . "." . $n7 . $n8 . $n9 . "-" . $d1 . $d2;
        } else {
            $retorno = '' . $n1 . $n2 . $n3 . $n4 . $n5 . $n6 . $n7 . $n8 . $n9 . $d1 . $d2;
        }
        return $retorno;
    }

    private static function mod($dividendo, $divisor) {
        return round($dividendo - (floor($dividendo / $divisor) * $divisor));
    }
}
