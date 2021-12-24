<?php if (isset($schemaArticle)) {
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?php echo $actual_link; ?>"
        },
        "headline": "<?php echo $title; ?>>",
        "description": "<?php echo $description; ?>",
        "image": [
            "<?php echo base_url().'/'.$item['id'].'/'.$item['avata']?>"
        ],
        "author": {
            "@type": "Organization",
            "name": "<?php echo $username; ?>",
            "url": "<?php echo $linkuser; ?>"
        },
        "publisher": {
            "@type": "Organization",
            "name": "<?php echo $tennhaxuatban; ?>",
            "logo": {
                "@type": "ImageObject",
                "url": "<?php echo $avata; ?>"
            }
        },
        "datePublished": "<?php echo gmdate('Y-m-d',$item['created_date']) ?>",
        "dateModified": "<?php echo gmdate('Y-m-d',$item['created_date']) ?>"
    }
</script>
<?php } ?>