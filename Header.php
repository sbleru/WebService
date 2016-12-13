<?php
class Header
{
	// 接続情報
	private static $conn_info;
	protected $pdo;
    protected $name;
    // エラーメッセージの初期化
	public $errorMessagge = "";
	public function get_error(){
		return $this->errorMessagge;
	}
	public function set_error($error_mess){
		$this->errorMessagge = $error_mess;
	}

    public function __construct()
    {
        $this->initDb();
    }

    public function initDb()
    {
        $dsn = sprintf(
            'mysql:host=%s; dbname=%s; unix_socket=%s; charset=utf8',
            self::$conn_info['host'],
            self::$conn_info['dbname'],
            self::$conn_info['unix_socket']
        );
        // echo $dsn;

        try{
        	$this->pdo = new PDO($dsn, self::$conn_info['dbuser'], self::$conn_info['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e){
        	$errorMessage = 'データベースエラー';
	        //$errorMessage = $sql;
	        // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
	        echo $e->getMessage();
        }
        
    }

    public static function setConnectionInfo($conn_info)
    {
        self::$conn_info = $conn_info;
    }
}
