<?php

declare(strict_types=1);

function greeting_supports($feature)
{
    switch ($feature) {
        case FEATURE_MOD_ARCHETYPE:
            return MOD_ARCHETYPE_RESOURCE;
        case FEATURE_GROUPINGS:
        case FEATURE_MOD_INTRO:
        case FEATURE_COMPLETION_TRACKS_VIEWS:
        case FEATURE_GRADE_HAS_GRADE:
        case FEATURE_GRADE_OUTCOMES:
        case FEATURE_BACKUP_MOODLE2:
        case FEATURE_GROUPS:
            return false;
        case FEATURE_SHOW_DESCRIPTION:
            return true;
        default:
            return null;
    }
}

function greeting_add_instance($data, $mform = null): int
{
    global $DB;
    $data->id = $DB->insert_record('greeting', $data);
    return $data->id;
}

function greeting_update_instance($data, $mform): bool
{
    global $DB;
    $data->id = $data->instance;
    return $DB->update_record('greeting', $data);
}

function greeting_delete_instance($id): bool
{
    global $DB;
    if (!$greeting = $DB->record_exists('greeting', ['id' => $id])) {
        return false;
    }
    $DB->delete_records('greeting', ['id' => $id]);
    return true;
}
