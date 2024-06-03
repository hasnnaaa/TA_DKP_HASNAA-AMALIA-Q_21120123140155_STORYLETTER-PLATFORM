<?php
class Story {
    private $title;
    private $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }
}

class StoryManager {
    const STORY_FILE = 'stories.txt';

    public function saveStory($story) {
        $stories = $this->getAllStories();
        $stories[] = [
            'title' => $story->getTitle(),
            'content' => $story->getContent()
        ];
        file_put_contents(self::STORY_FILE, json_encode($stories));
    }

    public function getAllStories() {
        if (file_exists(self::STORY_FILE)) {
            $json = file_get_contents(self::STORY_FILE);
            $stories = json_decode($json, true);
            if (is_array($stories)) {
                return $stories;
            }
        }
        return [];
    }

    public function undoStory() {
        $stories = $this->getAllStories();
        if (!empty($stories)) {
            array_pop($stories);
            file_put_contents(self::STORY_FILE, json_encode($stories));
        }
    }
}
?>