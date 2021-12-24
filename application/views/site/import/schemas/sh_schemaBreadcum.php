<?php if (isset($schemaBreadcrumb)) { ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Xem Vận Mệnh",
            "item": "https://xemvanmenh.net/"
        },<?php foreach ($schemaBreadcrumb as $key => $item) { ?>
{
                "@type": "ListItem",
                "position":  "<?php echo $key + 1; ?>",
                "name": "<?php echo $item['name']; ?>",
                "item": "<?php echo base_url() . $item['slug']; ?>"
            }

            <?php if ($key < count($schemaBreadcrumb) - 1) echo ',';
        } ?>
           ]}
    </script>
<?php } ?>
