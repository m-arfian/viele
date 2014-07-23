<?php

class Alert {

    public static function alertSuccess($note) {
        return "<div class = 'note note-success'><p>$note</p></div>";
    }
    
    public static function alertInfo($note) {
        return "<div class = 'note note-info'><p>$note</p></div>";
    }
    
    public static function alertWarning($note) {
        return "<div class = 'note note-warning'><p>$note</p></div>";
    }
    
    public static function alertDanger($note) {
        return "<div class = 'note note-danger'><p>$note</p></div>";
    }

}
