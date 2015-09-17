<?php
namespace Website\Console\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Output\InputInterface;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\OutputInterface;

class CareHomeRecommendationCommand extends AbstractCommand
{
    /**
     * Configure the command
     * @return
     */
    protected function configure()
    {
        $this
            ->setName('carehomes:recommendations')
            ->setDescription('Get the care home recommendations');
    }

    /**
     * Execute the command
     * @param  ArgvInput       $input
     * @param  OutputInterface $output
     * @return
     */
    protected function execute(ArgvInput $input, OutputInterface $output)
    {
        $list = new \Object\CareHomes\Listing();
        $careHomes = $list->load();

        foreach ($careHomes as $home) {
            $xml = simplexml_load_file(
                sprintf(
                    'http://www.carehome.co.uk/recommendations/rss.cfm?displayid=%d&displaycount=&displayorder=new&displayfullcomment=false&recommendationid=&excluderecommendationid=',
                    $home->getCareHomeId()
                )
            );

            foreach ($xml->channel->item as $review) {
                \Object\Recommendations::create([
                    'title'       => (string) $review->title,
                    'description' => (string) $review->description,
                    'author'      => (string) $review->author,
                ]);

                die();
            }
        }
    }
}
