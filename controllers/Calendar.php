<?php

/*
     Código escrito por Talianderson Dias
     em caso de dúvidas, mande um email para talianderson.web@gmail.com
*/

class Calendar{


    public function MostreSemanas(){

        $semanas = "DSTQQSS";
        for( $i = 0; $i < 7; $i++ )
            echo "<td>".$semanas{$i}."</td>";

    }

    public function GetNumeroDias($mes){

        $numero_dias = array(
            '01' => 31, '02' => 28, '03' => 31, '04' =>30, '05' => 31, '06' => 30,
            '07' => 31, '08' =>31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
        );

        if (((date('Y') % 4) == 0 and (date('Y') % 100)!=0) or (date('Y') % 400)==0){
            $numero_dias['02'] = 29;	// altera o numero de dias de fevereiro se o ano for bissexto
        }
        return $numero_dias[$mes];
    }

    public function GetNomeMes($mes){

        $meses = array( '01' => "Janeiro", '02' => "Fevereiro", '03' => "Março",
            '04' => "Abril",   '05' => "Maio",      '06' => "Junho",
            '07' => "Julho",   '08' => "Agosto",    '09' => "Setembro",
            '10' => "Outubro", '11' => "Novembro",  '12' => "Dezembro"
        );
        /*
        for ($m=01; $m <= 12; $m++) { 
            return $m;
        }

        foreach ($meses[$m] as $mes) {
            return $meses[$mes];
        }
        */
        if( $mes >= 01 && $mes <= 12){
            return $meses[$mes];

        }else{
            return "Mês deconhecido";
        }
        
    }



    public function MostreCalendario($mes){

        $numero_dias = $this->GetNumeroDias($mes);	// retorna o número de dias que tem o mês desejado
        $nome_mes_next = $mes + 1;
        $nome_mes_prev = $mes - 1;
        $diacorrente = 0;
        

        $diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );	// função que descobre o dia da semana
        //echo "<h1>Agenda</h1>";
        echo "<tr>"; 
        echo "<td colspan = 7> <h3><a  href='?pagina=".$nome_mes_prev."' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a>  ".$this->GetNomeMes($mes)
            ."  <a  href='?pagina=".$nome_mes_next."' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></h3><br></td><br>";
        echo "</tr>";
        echo "<tr>";
        $this->MostreSemanas();	// função que mostra as semanas aqui
        echo "</tr>";
        for( $linha = 0; $linha < 6; $linha++ ){

            echo "<tr>";

            for( $coluna = 0; $coluna < 7; $coluna++ ){

                echo "<td width = 30 height = 30 ";

                if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) ){
                    echo " id = 'dia_atual' ";
                }else{

                    if(($diacorrente + 1) <= $numero_dias ){

                        if( $coluna < $diasemana && $linha == 0){
                            echo " id = 'dia_branco' ";
                        }else{
                            echo " id = 'dia_comum' ";
                        }

                    }else{
                        echo " ";
                    }
                }

                echo " align = 'center' valign = 'center'>";

                /* TRECHO IMPORTANTE: A PARTIR DESTE TRECHO É MOSTRADO UM DIA DO CALENDÁRIO (MUITA ATENÇÃO NA HORA DA MANUTENÇÃO) */

                if($diacorrente + 1 <= $numero_dias){

                    $anoAtual = date('y');
                    $idModal = $anoAtual.'-'.$mes.'-'.($diacorrente + 1);

                    if($coluna < $diasemana && $linha == 0){



                        echo " ";



                    }else{

                         //echo "<input type = 'button' id = 'dia_comum' name = 'dia".($diacorrente+1)."'  value = '".++$diacorrente."'     onclick         = 'acao(this.value)'>";

                        echo "<a href = '?pagina=$anoAtual-$mes-".($diacorrente+1)."'>".++$diacorrente ."</a>";
                        
                        //echo '<button class="btn btn-primary" id="'.$idModal.'" data-toggle="modal" data-target="#modal-mensagem">'.++$diacorrente.'</button>'; 
                        //$_SESSION["id_modal"] = $idModal;
                    }


                /*if($diacorrente + 1 <= $numero_dias){

                    if($coluna < $diasemana && $linha == 0){

                        echo " ";
                        

                    }else{
                        $exDia = $diacorrente++;
                        $anoAtual = date('y');
                        $idModal = $anoAtual.'-'.$mes.'-'.$exDia;

                         //echo "<input type = 'button' id = 'dia_comum' name = 'dia".($diacorrente+1)."'  value = '".++$diacorrente."'     onclick         = 'acao(this.value)'>";
                        //echo "<button class='btn btn-primary' id='btn-mensagem'>".++$diacorrente."</button>";
                        echo '<button class="btn btn-primary" id="'.$idModal.'" data-toggle="modal" data-target="'.$idModal.'">'.($diacorrente+1).'</button>';
                        //echo "<a href = ?pagina=mes$mes-dia".($diacorrente+1).">".++$diacorrente . " </a>";   
                    }*/
                        //href = ".$_SERVER["PHP_SELF"]."?mes=$mes&dia=".($diacorrente+1).">".++$diacorrente . " </a>";
                }else{
                    break;
                }
                /* FIM DO TRECHO MUITO IMPORTANTE */

                echo "</td>";
            }
            echo "</tr>";

        }
        
    }

    public function MostreCalendarioCompleto(){

        echo "<table style='align = center'>";
        $cont = 1;

        for( $j = 0; $j < 4; $j++){

            echo "<tr>";
            for( $i = 0; $i < 3; $i++){

                echo "<td>";
                $this->MostreCalendario( ($cont < 10 ) ? "0".$cont : $cont );
                $cont++;
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
/*
    public function OptionMes()
    {
        $mesAtual = date("m"); 
        //return $this->GetNumeroDias($mesAtual);
        //return $this->GetNomeMes($mesAtual);

        $tagOptionIni = "<label for='Mês'>Escolha o Mês:</label>
        <select id='meses'>";

        for ($m=1; $m <= 12 ; $m++) { 
            return "<option value=".$m.">".$this->GetNomeMes($m)."</option>";
        }

        $tagOptionFnl = "</select>";
        return $tagOptionIni;
        return $tagOptionFnl;

    }*/
}

//$teste = new Calendar();

//echo $teste->OptionMes();

//$teste->MostreCalendario(01);

