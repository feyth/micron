<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
	<loc><?php echo BASE_URL;?></loc>
  	<lastmod><?php echo date('Y-m-d', time());?></lastmod>
  	<priority>1.00</priority>
  	<changefreq>daily</changefreq>
</url>
<?php foreach($posts as $post):?>
  <url>
    <loc><?php echo BASE_URL.$post['id'].'/'.$post['uri'];?></loc>
    <lastmod><?php echo date('Y-m-d', strtotime($post['date']));?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.6</priority>
  </url>
<?php endforeach;?>
</urlset>