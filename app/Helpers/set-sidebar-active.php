<?php

function setSidebarActive(array $route) : string
{
    foreach ($route as $r) {
        if(request()->routeIs($r)) {
            return 'active';
        }
    }
    return '';
}
