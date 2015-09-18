<?php
namespace Website\Console\Command;

use Cocur\Slugify\Slugify;
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
        $slugify = new Slugify();

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
                $recommendation = \Object\Recommendations::create([
                    'title'       => $slugify->slugify((string) $review->title),
                    'description' => '',
                ]);

                $recommendation->setTitle((string) $review->title);
                $recommendation->setDescription((string) $review->description);
                $recommendation->setAuthor((string) $review->author);
                $recommendation->setKey(uniqid());
                $recommendation->setParentId(uniqid());
                $recommendation->save();
die();
            }
        }
    }
}
