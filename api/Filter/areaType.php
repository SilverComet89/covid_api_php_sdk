<?php

namespace Api\Filter;

class areaType {
    const AREA_TYPE_OVERVIEW = 'overview'; // Overview data for the United Kingdom
    const AREA_TYPE_NATION = 'nation'; // Nation data (England, Northern Ireland, Scotland, and Wales)
    const AREA_TYPE_REGION = 'region'; // Region data
    const AREA_TYPE_NHS_REGION = 'nhsRegion'; // NHS Region data
    const AREA_TYPE_UTLA = 'utla'; // Upper-tier local authority data
    const AREA_TYPE_LTLA = 'ltla'; // Lower-tier local authority data
}
