<?php
if (!empty($item['questionAnswer'])&& $item['questionAnswer']!='') {
$questionAnswers = json_decode($item['questionAnswer']);
?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                <?php foreach($questionAnswers as $key => $questionAnswer){?>
                {
                "@type": "Question",
                "name": "<?php echo $questionAnswer->question;?>",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "<?php echo $questionAnswer->answer;?>"
                    }
                }<?php if($key<count($questionAnswers)-1){echo ',';} } ?>
            ]
        }
    </script>
<?php } ?>