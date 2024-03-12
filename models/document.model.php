<?php
    class Documento extends Conexion{
        /* TODO: Listar Registros */
        public function get_document($doc_tipo){
            $conectar=parent::cn();
            $sql="SP_L_DOCUMENTO_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$doc_tipo);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>