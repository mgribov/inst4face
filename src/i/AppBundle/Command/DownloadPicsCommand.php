<?php
namespace i\AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DownloadPicsCommand extends ContainerAwareCommand {
    
    protected function configure() {
        $this->setDefinition(array())
            ->setName('i:pics:download')    
            ->setDescription('Download pics from database to store locally')
            ->addOption('folder',  'f', InputOption::VALUE_OPTIONAL, 'Folder to download to', '/tmp/images')    
            ->setHelp(<<<EOT
The <info>i:pics:download</info> command crawls the pic table and dowloads all pictures locally for later processing
EOT
            );
    }
    
    protected function execute(InputInterface $input, OutputInterface $output) {
        $pics = $this->getContainer()
                ->get('doctrine.orm.entity_manager')
                ->getRepository('iAppBundle:Pic')
                ->getAll();
        
        foreach ($pics as $pic) {
            $output->writeln("<info>downloading {$pic['url']} to {$input->getOption('folder')}</info>");
            sleep(1);
            
            if ($this->download($pic['url'], $input->getOption('folder'))) {
                $output->writeln("<info>success</info>");
            } else {
                $output->writeln("<error>fail</error>");
            }
            
        }
    }
    
    protected function download($url, $folder) {
        if (time() % 2 == 0) {
            return true;
        }
        
        return false;
    }
}