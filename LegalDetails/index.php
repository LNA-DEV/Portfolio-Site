<?php

$url = "https://api.lna-dev.net/PersonalWebsite/Metadata";

$data = file_get_contents($url, true);

$json = json_decode($data, true);

foreach ($json as $key => $value) {
    if ($value["name"] == "Icon") {
        $icon = $value["value"];
    } else if ($value["name"] == "HomeDescription") {
        $homeDescription = $value["value"];
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <title>Privacy Policy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Kontakt</h1>
        <p> Lukas Nagel<br> Telefon: +49 15678696547<br> E-Mail: nagellukas04@outlook.com<br> <br></p>
        <h2 class="mt-3">Haftung für Inhalte</h2>
        <p>Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den nicht
            verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu
            forschen, die auf eine rechtswidrige Tätigkeit hinweisen.<br><br>
            Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen
            Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der
            Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden
            Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p>
        <h2 class="mt-3">Haftung für Links</h2>
        <p>Unser Angebot enthält Links zu externen Websites Dritter, auf deren Inhalte wir keinen Einfluss haben.
            Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der
            verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten
            Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte
            waren zum Zeitpunkt der Verlinkung nicht erkennbar.<br><br>
            Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer
            Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links
            umgehend entfernen.</p>
        <h2 class="mt-3">Urheberrecht</h2>
        <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen
            Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der
            Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.
            Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet.<br><br>
            Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter
            beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine
            Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei
            Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.
            <br><br>
            Quelle:
            eRecht24



            <br><br>
            <br><br>
        </p>
        <h1 class="mt-3">Contact</h1>
        <p>Lukas Nagel<br>
            Phone: 015678696547<br>
            E-mail: nagellukas04@outlook.com<br>
            <br>
        </p>
        <h2 class="mt-3">Liablility for content</h2>
        <p>As a service provider, we are in accordance with § 7 Abs.1 TMG for their own content on these pages after the not
            obliged to monitor transmitted or stored third-party information or to investigate circumstances
            research, which indicate an illegal activity.<br><br>
            Obligations to remove or block the use of information in accordance with the general
            Laws remain unaffected. A liability in this regard, however, is only possible from the time of the
            Knowledge of a concrete infringement possible. If we become aware of corresponding infringements, we will
            Violations, we will remove this content immediately.</p>
        <h2 class="mt-3">Liablity for links</h2>
        <p>Our offer contains links to external websites of third parties, on whose contents we have no influence.
            Therefore, we can not assume any liability for these external contents. For the contents of the
            linked pages is always the respective provider or operator of the pages. The linked
            pages were checked for possible legal violations at the time of linking. Illegal contents
            were not recognizable at the time of linking.<br><br>
            However, a permanent control of the linked pages is not reasonable without concrete evidence of an
            infringement is not reasonable. If we become aware of any violations of the law, we will remove such links
            immediately remove.</p>
        <h2 class="mt-3">Copyright</h2>
        <p> The content and works created by the site operators on these pages are subject to German
            copyright law. The reproduction, processing, distribution and any kind of exploitation outside the
            limits of copyright law require the written consent of the respective author or creator.
            Downloads and copies of this page are only permitted for private, non-commercial use.<br><br>
            As far as the content on this site was not created by the operator, the copyrights of third parties are
            respected. In particular, third-party content is marked as such. Should you nevertheless become aware of a
            Copyright infringement, we ask for an appropriate notice. At
            Be aware of infringements, we will remove such content immediately.
            <br><br>
        </p>
        <p class="mb-5">Source:<br>eRecht24</p>
        <p></p>
    </div>

    <?php
    include "../Backend/Analytics.php";
    ?>
</body>

</html>