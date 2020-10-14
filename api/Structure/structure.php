<?php
namespace Api\Structure;

class structure {
    // Basic - Same as Filter metrics
    const METRIC_AREA_TYPE = 'areaType';
    const METRIC_AREA_NAME = 'areaName';
    const METRIC_AREA_CODE = 'areaCode';
    const METRIC_DATE = 'date';
    const METRIC_HASH = 'hash';

    // Cases
    const METRIC_NEW_CASES_BY_PUBLISH_DATE = 'newCasesByPublishDate';
    const METRIC_CUM_CASES_BY_PUBLISH_DATE = 'cumCasesByPublishDate';
    const METRIC_CUM_CASES_BY_SPECIMEN_DATE_RATE = 'cumCasesBySpecimenDateRate';
    const METRIC_NEW_CASES_BY_SPECIMEN_DATE = 'newCasesBySpecimenDate';
    const METRIC_CUM_CASES_BY_SPECIMEN_DATE = 'cumCasesBySpecimenDate';
    const METRIC_MALE_CASES = 'maleCases';
    const METRIC_FEMALE_CASES = 'femaleCases';

    // Tests
    const METRIC_NEW_PILLAR_ONE_TESTS_BY_PUBLISH_DATE = 'newPillarOneTestsByPublishDate';
    const METRIC_CUM_PILLAR_ONE_TESTS_BY_PUBLISH_DATE = 'cumPillarOneTestsByPublishDate';
    const METRIC_NEW_PILLAR_TWO_TESTS_BY_PUBLISH_DATE = 'newPillarTwoTestsByPublishDate';
    const METRIC_CUM_PILLAR_TWO_TESTS_BY_PUBLISH_DATE = 'cumPillarTwoTestsByPublishDate';
    const METRIC_NEW_PILLAR_THREE_TESTS_BY_PUBLISH_DATE = 'newPillarThreeTestsByPublishDate';
    const METRIC_CUM_PILLAR_THREE_TESTS_BY_PUBLISH_DATE = 'cumPillarThreeTestsByPublishDate';
    const METRIC_NEW_PILLAR_FOUR_TESTS_BY_PUBLISH_DATE = 'newPillarFourTestsByPublishDate';
    const METRIC_CUM_PILLAR_FOUR_TESTS_BY_PUBLISH_DATE = 'cumPillarFourTestsByPublishDate';
    const METRIC_CUM_TESTS_BY_PUBLISH_DATE = 'cumTestsByPublishDate';
    const METRIC_NEW_TESTS_BY_PUBLISH_DATE = 'newTestsByPublishDate';

    // Admissions
    const METRIC_NEW_ADMISSIONS = 'newAdmissions';
    const METRIC_CUM_ADMISSIONS = 'cumAdmissions';
    const METRIC_CUM_ADMISSIONS_BY_AGE = 'cumAdmissionsByAge';
    const METRIC_HOSPITAL_CASES = 'hospitalCases';

    // Capacity
    const METRIC_PLANNED_CAPACITY_BY_PUBLISH_DATE = 'plannedCapacityByPublishDate';

    // Deaths
    const METRIC_NEW_DEATHS_28_DAYS_BY_PUBLISH_DATE = 'newDeaths28DaysByPublishDate';
    const METRIC_CUM_DEATHS_28_DAYS_BY_PUBLISH_DATE = 'cumDeaths28DaysByPublishDate';
    const METRIC_CUM_DEATHS_28_DAYS_BY_PUBLISH_DATE_RATE = 'cumDeaths28DaysByPublishDateRate';
    const METRIC_NEW_DEATHS_28_DAYS_BY_DEATH_DATE = 'newDeaths28DaysByDeathDate';
    const METRIC_CUM_DEATHS_28_DAYS_BY_DEATH_DATE = 'cumDeaths28DaysByDeathDate';
    const METRIC_CUM_DEATHS_28_DAYS_BY_DEATH_DATE_RATE = 'cumDeaths28DaysByDeathDate';

    static $structure = [];
    
    /**
     * addStructure function
     * Adds a structure responseName:metric pair in to the structure array.
     * @param string $metric
     * @param array|string $responseName - This can be either an array of structure key pairs, or a single response name. If null then response name will be used.
     * @return void
     */
    public function addStructure(string $responseName, $metric=null) {
        return self::$structure[$responseName] = (is_null($metric)) ? $responseName : $metric;
    }

    /**
     * getStructure function
     * Returns the data associated with the responseName in the structure.
     * @param string $metric
     * @return array|string - Can be either an array of metric:response pairs or can be a single string displaying the display name associated.
     */
    public function getStructure(string $metric) {
        if(array_key_exists($metric, self::$structure)) {
            return self::$structure[$metric];
        }

        return false;
    }

    /**
     * getStructureString function
     * returns url encoded json array string on success.
     * @return string
     */
    public static function getStructureString() {
        if(!empty(self::$structure)){
            return 'structure='.urlencode(json_encode(self::$structure));
        }

        throw new \Exception('There are no structures currently assigned.');
    }
}