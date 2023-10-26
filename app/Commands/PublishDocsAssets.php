<?php

namespace App\Commands;

use BlitzPHP\Cli\Console\Command;
use BlitzPHP\Facades\Fs;
use Symfony\Component\Finder\SplFileInfo;

class PublishDocsAssets extends Command
{
    /** @var string Groupe auquel appartient la commande */
    protected $group = 'App';

    /** @var string Nom de la commande */
    protected $name = 'app:publish:assets';

    /** @var string Description de la commande */
    protected $description = 'Publie les assets de la documentation dans le dossier public';

    /** @var array Arguments de la commande */
    protected $arguments = [];

    /** @var array Options de la commande */
    protected $options = [];

    /**
     * Execution de la commande
     *
     * @param array $params
     */
    public function execute(array $params)
    {
        if (! is_dir($base_path = resource_path('docs'))) {
            return EXIT_SUCCESS;
        }

        $this->task('Copie des assets de la documentation');
        usleep(1000);
        
        if (! is_dir($target_dir = img_path('docs'))) {
            mkdir($target_dir, 0777, true);
        }
        
        /** @var SplFileInfo[] $files */
        $files = collect(Fs::allFiles($base_path))
        ->filter(fn(SplFileInfo $file) => $file->getExtension() !== 'md')
        ->filter(fn(SplFileInfo $file) => ! in_array($file->getFilename(), ['index.json', 'LICENSE']))
        ->all();
        
        foreach ($files as $file) {
            $target_path = str_replace(['/', '\\'], DS, rtrim($target_dir, '/\\') . DS . ltrim($file->getRelativePathname(), '/\\'));

            if (! is_dir($dir = pathinfo($target_path, PATHINFO_DIRNAME))) {
                mkdir($dir, 0777, true);
            }

            Fs::move($file->getRealPath(), $target_path, true);
        }
        
        usleep(1000);
        $this->eol()->success('Terminé avec succès');
    }
}
