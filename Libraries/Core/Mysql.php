<?php
    class Mysql extends Conexion
    {
        private $conexion;
        private $strQuery;
        private $arrValues;

        public function __construct()
        {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }

        public function insert(String $query, array $arrValues)
        {
            $this->strQuery = $query;
            $this->arrValues = $arrValues;
            $insert = $this->conexion->prepare($this->strQuery);
            $resInsert = $insert->execute($this->arrValues);
            if($resInsert)
            {
                $lastInsert = $this->conexion->lastInsertId();
            } else {
                $lastInsert = 0;
            }
                return $lastInsert;
        }

        public function select(String $query)
        {
            $this->strQuery = $query;
            $result = $this->conexion->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        public function select_all(String $query)
        {
            $this->strQuery = $query;
            $result = $this->conexion->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }

        public function update(String $query, array $arrValues)
        {
            $this->strQuery = $query;
            $this->arrValues = $arrValues;
            $update = $this->conexion->prepare($this->strQuery);
            $resExecute = $update->execute($this->arrValues);
            return $resExecute;
        }

        public function delete(String $query)
        {
            $this->strQuery = $query;
            $result = $this->conexion->prepare($this->strQuery);
            $result -> execute();
            return $result;
        }
    }
    ?>