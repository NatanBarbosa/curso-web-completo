<?php
#classe dashboard
//instanciar um objeto que tenha todos os atributos para colocar nas tabelas do index

class Dashboard {
    #datas
    public $data_inicio;
    public $data_fim;

    #tb_vendas
    public $numeroVendas;
    public $totalVendas;

    #tb_clientes
    public $clientesAtivos;
    public $clientesInativos;

    #tb_contatos(sugestões, elogios, reclamações)
    public $sugestoes;
    public $elogios;
    public $reclamacoes;

    #tb_despesas
    public $totalDespesas;


    #Métodos mágicos
    public function __get($attr){
        return $this->$attr;
    }

    public function __set($attr, $val){
        $this->$attr = $val;
        return $this;
    }
}

#classe conexao
//classe que fará as conexões com o banco

class Conexao{
    private $host = 'localhost';
    private $dbname = 'bd_dashboard';
    private $user = 'root';
    private $senha = '';

    public function conectar(){
        try{
            //iniciando conexão com o BD
            $conec = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->user,
                $this->senha
            );

            //definindo caracteres como utf-8
            $conec->exec('SET charset set utf8');

            return $conec;

        } catch(PDOException $e){

            echo '<p> Ocorreu um erro: <br>' . $e->getMessage() . '</p>';
        }
    }
}

#Classe bd
//classe que fará as ações do MySql
class Bd{
    private $conexao;
    private $dashboard;

    public function __construct(Conexao $conexao,Dashboard $dashboard){
        $this->conexao = $conexao->conectar();
        $this->dashboard = $dashboard;
    }

    #recuperando o número de vendas
    public function getNumeroVendas(){
        $query = "SELECT count(*) AS numero_vendas FROM tb_vendas WHERE data_venda BETWEEN :data_inicio AND :data_fim";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_inicio', $this->dashboard->__get( 'data_inicio') );
        $stmt->bindValue(':data_fim', $this->dashboard->__get( 'data_fim') );
        $stmt->execute();

        $numeroVendas = $stmt->fetch(PDO::FETCH_OBJ); //ex: stdClass Object { numero_vendas: 4 }
        return $numeroVendas->numero_vendas;
    }

    #recuperando o total de vendas
    public function getTotalVendas(){
        $query = "SELECT sum(total) AS total_vendas FROM tb_vendas WHERE data_venda BETWEEN :data_inicio AND :data_fim";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_inicio', $this->dashboard->__get( 'data_inicio') );
        $stmt->bindValue(':data_fim', $this->dashboard->__get( 'data_fim') );
        $stmt->execute();

        $totalVendas = $stmt->fetch(PDO::FETCH_OBJ);
        return $totalVendas->total_vendas;
    }

    #recuperando clientes ativos ou inativos
    public function getClientes($atividade){
        $query = "SELECT count(*) as clientes_ativos FROM tb_clientes WHERE cliente_ativo = :ativo";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue( ':ativo', $atividade );
        $stmt->execute();

        $clientes = $stmt->fetch(PDO::FETCH_OBJ);
        return $clientes->clientes_ativos;
    }

    #recuperando motivo de contato
    //1 = reclamação | 2 = sugestão | 3 = elogio
    public function getContato($tipoContato){
        $query = "SELECT count(*) as tipo_contato FROM tb_contatos WHERE tipo_contato = :tipo";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue( ':tipo', $tipoContato );
        $stmt->execute();

        $contato = $stmt->fetch(PDO::FETCH_OBJ);
        return $contato->tipo_contato;
    }

    #recuperando total de despesas
    public function getTotalDespesas(){
        $query = "SELECT sum(total) AS total_despesas FROM tb_despesas WHERE data_despesa BETWEEN :data_inicio AND :data_fim";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_inicio', $this->dashboard->__get( 'data_inicio') );
        $stmt->bindValue(':data_fim', $this->dashboard->__get( 'data_fim') );
        $stmt->execute();

        $totalDespesas = $stmt->fetch(PDO::FETCH_OBJ);
        return $totalDespesas->total_despesas;
    }


}

$conexao = new Conexao();
$dashboard = new Dashboard();

#recuperando a data por GET da requisição e
#settando as datas das consultas
$dashboard->__set('data_inicio', $_GET['competencia'].'-01');
$dashboard->__set('data_fim', $_GET['competencia'].'-31');


$bd = new Bd($conexao, $dashboard);

#recuperando o número de vendas
$dashboard->__set( 'numeroVendas', $bd->getNumeroVendas() );

#recuperando o total de vendas
$dashboard->__set( 'totalVendas', $bd->getTotalVendas() );

#recuperando clientes ativos
//1 = ativo | 0 = inativo
$dashboard->__set( 'clientesAtivos', $bd->getClientes(1) );

#recuperando clientes inativos
$dashboard->__set( 'clientesInativos', $bd->getClientes(0) );

#recuperando reclamações
//1 = reclamação | 2 = sugestão | 3 = elogio
$dashboard->__set('reclamacoes', $bd->getContato(1));

#recuperando elogios
$dashboard->__set('elogios', $bd->getContato(2));

#recuperando sugestões
$dashboard->__set('sugestoes', $bd->getContato(3));

#recuperando total de despesas
$dashboard->__set('totalDespesas', $bd->getTotalDespesas() );

#retornando um objeto json como resposta da requisição
echo json_encode($dashboard);


