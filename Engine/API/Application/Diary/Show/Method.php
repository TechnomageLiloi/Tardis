<?php

namespace Liloi\Tardis\API\Application\Diary\Show;

use Liloi\API\Response;
use Liloi\Tardis\API\Method as SuperMethod;
use Liloi\Tardis\Domain\Diary\Manager as DiaryManager;
use Liloi\Tardis\Domain\Lessons\Manager as LessonsManager;

/**
 * Rune API: Tardis.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entityDiary = DiaryManager::loadCurrent();
        $entityLesson = LessonsManager::loadCurrent();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entityDiary,
            'lesson' => $entityLesson
        ]));

        return $response;
    }
}