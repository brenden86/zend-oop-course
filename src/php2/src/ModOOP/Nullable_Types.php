<?php
declare(strict_types=1);
// you want type hinting, but wish to allow NULL to be passed
class Topic
{
    protected $title;
    protected $subTitle;
    protected $bullets;
    /**
     * @param string $title
     * @param string | NULL $subTitle
     * @param array $bullets
     */
    public function __construct(string $title, ?string $subTitle, array $bullets)
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->bullets = $bullets;
    }
    /**
     * Returns HTML <h2>xxx</h2> etc.
     */
    public function __toString()
    {
        $html = '';
        $html .= '<h2>' . $this->title . '</h2>' . PHP_EOL;
        $html .= (!empty($this->subTitle))
                 ? '<h3>' . $this->subTitle . '</h3>' . PHP_EOL
                 : '';
        $html .= '<ul><li>' . implode('</li><li>', $this->bullets) . '</li></ul>' . PHP_EOL;
        return $html;
    }
}

$topic[] = new Topic('Nullable Types', NULL, ['Point 1','Point 2','Point 2']);
$topic[] = new Topic('Nullable Types', 'Why Use Them?', ['Point 1','Point 2','Point 2']);
$topic[] = new Topic('Nullable Types', 'Usage Examples', ['Point 1','Point 2','Point 2']);

foreach ($topic as $item) {
    echo $item;
}
