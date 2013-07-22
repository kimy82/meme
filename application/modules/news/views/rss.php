<?php echo '<?xml version="1.0" encoding="utf-8"?>' . "\n"; ?>
<rss version="2.0">
	<channel>    
		<title><?php echo $feed_name; ?></title>
		<language><?php echo $feed_language; ?></language> 
		<description><?php echo $feed_description; ?></description>
		<?php foreach($query as $row): ?>
		<item>	
			<title><?php echo xml_convert($row->title); ?></title>
			<link><?php echo get_news_url($row->slug); ?></link>
			<description><![CDATA[<?php echo str_replace('/uploads/', base_url() . 'uploads/', $row->text); ?>]]></description>
			<pubDate><?php echo $row->date; ?>T<?php echo $row->time; ?></pubDate>
		</item>
		<?php endforeach; ?>	
	</channel>
</rss>