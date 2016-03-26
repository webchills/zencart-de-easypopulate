# zencart-de-easypopulate
Easy Populate 4 für Zen Cart 1.5.x deutsch

Version 4.034 vom 26.03.2016

Easy Populate 4 ermöglicht den Export/Import von Artikeln in einen Zen Cart Shop und kann auch für das Massenupdate von z.B. Preisen genutzt werden.
Die Funktionalität wurde gegenüber früheren Easy Populate Versionen stark erweitert und verbessert.
Easy Populate 4 ist derzeit noch als Beta eingestuft, arbeitet aber sehr zuverlässig.

Diese Version von Easy Populate ist auch in Zen Cart 1.5.3 deutsch und 1.5.1 deutsch verwendbar

Vor dem Einsatz von Easy Populate 4 die Hinweise und Tipps in dieser liesmich.txt genau lesen!


INSTALLATION:

AUSSCHLIESSLICH ERST IN EINEM TESTSHOP VERWENDEN UM SICH MIT DER FUNKTIONSWEISE VERTRAUT ZU MACHEN!


1)
Im Ordner NEUE DATEIEN den Ordner DEINADMIN auf den Namen des Admin Verzeichnisses umbenennen

2)
Jetzt die Ordner/Dateien im Ordner NEUE DATEIEN in der vorgegebenen Struktur ins Zen-Cart Verzeichnis hochladen, dabei werden keine bestehenden Dateien überschrieben.
Dem Ordner temp Schreibrechte geben (chmod 777) hier werden später die Exportdateien abgelegt.

3)
In die Zen-Cart Administration einloggen und auf irgendeinen Menüpunkt clicken

4)
Unter Tools ist nun der Menüpunkt Easy Populate 4
Anclicken
Oben erscheint nun:
Easy Populate Konfigurationeinstellungen fehlen. Bitte installieren Sie die Easy Populate Einstellungen, indem Sie auf Install EP4 klicken.
Anclicken und die Konfiguration wird installiert und ist danach unter Konfiguration > Easy Populate 4 vorhanden 

5)
Konfiguration an die eigenen Wünsche anpassen und danach unter Tools > Easy Populate am besten mal einen Export "Complete Products" machen, um sich mit der Funktionsweise vertraut zu machen


HINWEISE UND TIPPS ZUR VERWENDUNG

Bevor Easy Populate 4 verwendet wird, sollten Sie bereits ein paar Kategorien und Artikel im Shop vollständig angelegt haben.
Nur dann ist ein sinnvoller Export möglich und Sie können sich mit der Struktur der Exportdatei vertraut machen um Ihren Import gut vorbereiten zu können


GRUNDLEGENDE DINGE

1)
Machen Sie vor jedem Import mit Easy Populate 4 IMMER eine Sicherung Ihrer Datenbank.
Diese Version ist noch als Beta eingestuft, auch wenn sie sehr zuverlässig arbeitet.
Selbst wenn es keine Beta wäre:
Ein Import ändert Ihren Artikelbestand und sollte irgendetwas schief gehen oder Ihre Importdatei falsche Angaben enthalten, dann können Sie einfach Ihr zuvor angelegtes Backup einspielen und neu beginnen.

2)
Easy Populate 4 arbeitet ausschließlich mit csv Dateien! Kein xls oder txt, sondern nur csv.
Zum Bearbeiten von csv Dateien nutzen Sie bitte ausschließlich Open Office.
Excel ist aufgrund mangelnder Kompatibilität mit utf-8 und anderere Unzulänglichkeiten für csv Dateien NICHT geeignet.
In Open Office stellen Sie beim Öffnen einer von Easy Populate generierten csv Datei folgendes ein:
Kodierung: utf-8
Feld Trennzeichen: Komma (,)
Texttrenner: Anführungszeichen (")
Nur dann erhalten Sie in der Vorschau eine Tabellenstruktur und nur dann wird Easy Populate 4 korrekt arbeiten
Die Spalten am besten auf Format Text einstellen, damit z.B. nicht Daten oder Preise in irgendetwas anderes umgewandelt werden.
Ändern Sie nicht die Bennenung der Spaltenüberschriften!

3)
Easy Populate arbeitet mit Ihren Artikelnummern und die müssen pro Artikel eindeutig sein!
Jeder Ihrer Artikel MUSS eine eindeutige Artikelnummer haben. Einträge mit fehlender Artikelnummer werden bei einem Import nicht berücksichtigt.
Ihre Artikelnummern sollten eindeutig sein, jeder Artikel hat eine eigene.
Hätten zwei Artikel in Ihrer Liste dieselbe Artikelnummer, dann würde der spätere Eintrag in der Liste beim Import den früheren überschrieben.
Einzige Ausnahme:
Wenn bei 2 Artikeln mit gleicher Artikelnummer jeweils unterschiedliche Kategorienamen angegeben werden, dann ist das Importergebnis ein "verlinkter" Artikel in den beiden Kategorien.
Echte Artikelduplikate mit gleichen Artikelnummern werden nicht unterstützt.
Prüfen Sie Ihren Datenbestand auf doppelte Artikelnummern!

4)
Kategorienamen
Easy Populate 4 arbeitet anders als frühere Easy Populate Versionen und verwendet für den Import/Zuordnung von Kategorien die Kategorienamen und nicht die Kategorie IDs
Dadurch ist es möglich unterschiedliche Kategorienamen für die verschiedenen im Shop aktiven Sprachen zu hinterlegen, so dass wie bei den Artikelnamen und Artikelbeschreibungen ein vollständiger Multilanguage Import möglich ist.
v_categories_name_43 ist also die Spalte für die Kategorienamen in deutsch
v_categories_name_1 ist also die Spalte für die Kategorienamen in englisch

Unterkategorien werden immer mit dem "Karat" Zeichen getrennt:
^
Haben Sie also eine Hauptkategorie namens Hardware und darunter eine Unterkategorie namens Drucker, dann wäre der Name der Kategorie Drucker so anzugeben:
Hardware^Drucker

Ist Ihr Shop auch in englisch, dann geben Sie im entsprechenden Feld an:
Hardware^Printer

Einde dritte Unterkategorie wäre z.B.
Hardware^Drucker^Laserdrucker

Sie sehen das am besten, wenn Sie einen Export Ihrere bereits angelegten Artikel machen

Achten Sie auf die durchgehend gleiche Benennung der Kategorienamen.
Groß und Klein Schreibung ist wichtig und wenn Sie Hardware^Drucker und Hardware^drucker oder Hardware^DRUCKER mischen würden, dann würden unterschiedliche Kategorien angelegt werden.


5)
Dateinamen der Export Dateien
Ändern Sie nicht den Beginn der Dateinamen!
Der Beginn der Dateinamen dient Easy Populate 4 als Kennung, um welchen Import es sich hier handeln soll.
Ein Export aller Artikel liefert z.B. die Datei
Full-EP2015Jan20-104348.csv
Wenn Sie diese Datei dann bearbeiten zum späteren Import, dann lassen Sie das Full-EP am Anfang des Dateinamens unverändert!
Was danach kommt können Sie ändern um die Datei für sich selbst besser zuordnen zu können aber der Dateiname für einen Komplettimport muss eben mit Full-EP beginnen
Genau dasselbe gilt für die anderen Exportvarianten
PriceBreaks-EP = Kennung für einen Staffelpreise Import
CategoryMeta-EP = Kennung für Nur Kategorien mit Metatags Import
Featured-EP = Kennung für Import der Empfohlenen Artikel
SBA-Stock-EP = Kennung für einen Stock by Attributes Lagerbestand Import
Attrib-Basic-EP = Kennung für einen Import der Attribute einfach
Attrib-Detailed-EP = Kennung für einen Import der Attribute detailliert


6)
Konfiguration und Workflow
Unter Konfiguration > Easy Populate 4 sind die verschiedenen Einstellungsmöglichkeiten erklärt.
Easy Populate 4 erkennt automatisch ob Sie Ihre Produkt Tabelle durch einige bekannte Erweiterungen verändert haben und wird solche Felder dann automatisch mitberücksichtigen.
Wenn Sie die Tabelle products mit eigenen benutzerdefinierten Feldern erweitert haben und diese für einen Export/Import nutzen wollen, dann tragen Sie die Namen dieser Felder kommagetrennt entsprechend ein.
Auch diese Felder werden dann in die Exportdatei aufgenommen.

Der Workflow ist bei Easy Populate anders als in früheren Easy Populate Versionen
Machen Sie erst verschiedene Exporte um sich mit dem Aufbau der csv Dateien vertraut zu machen.
Erstellen Sie anhand dieser Vorgaben Ihre eigene csv Datei für einen Import, benennen Sie sie entsprechend und laden sie hoch
Dann clicken Sie auf Import.
Wenn Ihre Datei sehr viele Artikel enthält dann können Sie optional auch die Datei splitten.
In der Konfiguration können Sie angeben, ab wann gesplittet werden soll (Voreingestellt: 2000)
Das ist sehr konservativ eingestellt. Wenn Sie ein professionelles Webhostingpaket besitzen, dann sollte es kein Problem sein auch 20000 Einträge auf einmal zu importieren.
