<?php
namespace Api\Page;

class page {
    static $page = NULL; // Must be an int
    
    /**
     * setPage function
     *
     * @param integer $pageId
     * @return int
     */
    public function setPage(int $pageId) {
        return self::$page = $pageId;
    }


    /**
     * getPageString function
     * @return string|null
     */
    public static function getPageString() {
        if(!is_null(self::$page)){
            return 'page='.self::$page;
        }
        
        return self::$page;
    }
}