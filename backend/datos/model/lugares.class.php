<?php
    class lugar{
        /**
        * Almacena la conexion a la base de datos
        */
        private $db;
        /**
        * Tabla de donde se obtienen los datos
        */
        private $table;
        /**
        * Constructor.
        * @param string db cadena de conexion de la DB
        */

        public function __construct($db){

            $this->db = $db;
            $this->table = "lugares";

        }

        /**
        * Metodo que obtiene todos los registros de la tabla categorias.
        * @param string condicion where del query, si se requiere
        */
        public function selectAll($where = ""){
            /** Realiza el query */
            $sql = "SELECT Id, Titulo , Ubicacion, Descripcion, Portada, Foto1, Foto2, Foto3, Foto4, Foto5, Status, Tipo,  Created_date, Created_by,
                        Updated_by, Updated_date
                            FROM " . $this->table ."" . $where ;
            //echo $sql;
            $result = $this->db->ejecutar($sql);
            if($this->db->numRows($result)){
                return $result;
            }
            else{
                return 0;
            }
        }



        public function selectOne($where = ""){
            /** Realiza el query */
            $sql = "SELECT Id, Nombre, Url, Posicion, Status, Created_at, Created_by
                            FROM " . $this->table ."" . $where ;
            //echo $sql;
            $result = $this->db->ejecutar($sql);
            if($this->db->numRows($result)){
                return $result;
            }
            else{
                return 0;
            }
        }


        /**
        * Metodo que obtiene todos los registros de la tabla categorias.
        * @param string condicion where del query, si se requiere
        */

         /**
        * Metodo que cuenta los registros
        * @param string condicion where del query, si se requiere
        */
        public function count($where = ""){
             /** Realiza el query */

                $sql = "SELECT COUNT(Id) AS num
                    FROM " . $this->table . "

                    " . $where;
            //echo $sql;
            $result = $this->db->ejecutar($sql);
            if($this->db->numRows($result)){
                return $result;
            }
            else{
                return 0;
            }
        }





        /**
         * Ingresa datos a la BD
         * @param array campos en los cuales se ingresa la informacion
         * @param array informacion a ingresar
         */
        public function insertData($data){
            $result = $this->db->insertData($data,$this->table);
            if($result){
                return true;
            }
            else{
                return false;
            }
        }

        /**
         * edita datos de la BD
         * @param array campos a editar
         * @param array Informacion a ingresar
         * @param string condicion where del query
         */
        public function updateData($data,$where){
            $result = $this->db->updateData($data,$where,$this->table);
            if($result){
                return true;
            }
            else{
                return false;
            }
        }

        /**
         * Elimina datos en la BD
         * @param array envia todos los id que se quieren eliminar
         */
        public function delData($idDel){
            if($this->db->deleteData($this->table,$idDel) === true){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>