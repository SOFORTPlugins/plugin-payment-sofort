<div class="alert alert-warning" role="alert">
   <strong><i>Hinweis:</strong></i> Das SOFORT-Plugin ist für die Nutzung mit dem Webshop Ceres entwickelt und funktioniert nur mit dessen Logikstruktur oder anderen Template-Plugins. 
</div>

# SOFORT Überweisung – Bargeldloses Bezahlen in plentymarkets Online-Shops

Mit dem plentymarkets SOFORT Plugin binden Sie **SOFORT Überweisung** in Ihren Webshop ein.

## SOFORT-Konto eröffnen

Bevor Sie die Zahlungsart in plentymarkets einrichten können, ist die [Eröffnung eines Geschäftskontos bei SOFORT](https://www.sofort.com/payment/users/register) erforderlich. Sie erhalten dann Informationen sowie Zugangsdaten, die Sie für die Einrichtung in plentymarkets benötigen.

## Plugin-Installation

Bevor das Modul verwendet werden kann, muss dieses in plentymarkets installiert werden.

**Installation des SOFORT-Plugins via plentyMarketplace:**

1. [plentyMarketplace](https://marketplace.plentymarkets.com/) im Browser aufrufen
2. Finden Sie das Plugin unter **Payment** → **SOFORT**
3. **Go to checkout** (Login) und den Einkauf bestätigen
4. Backend vom Shop aufrufen
5. Menü Plugins **» Purchases** öffnen
6. Schaltfläche **Install** für das SOFORT-Plugin betätigen

**Installation des SOFORT-Plugins via GIT:**

1. Menü **Plugins » Git** öffnen
2. **New Plugin** auswählen. Es öffnet sich das Fenster **Settings**.
3. Verbinden Sie Ihren GitHub-Zugang und tragen Sie **User Name** und **Password** ein
4.	Tragen Sie die Remote-URL des SOFORT-Plugins ein: <https://github.com/frontend-studios/plugin-payment-sofort.git>
5.	Aktivieren Sie **Auto fetch**
6.	Abschließend speichern mit **Save**

## SOFORT in plentymarkets einrichten

Bevor Sie die Funktionen des SOFORT-Plugins nutzen können, müssen Sie zuerst Ihr SOFORT-Konto mit Ihrem plentymarkets System verbinden.

##### SOFORT-Konto anbinden:
  
1. Öffnen Sie das Menü **Plugins » Übersicht**.
2. Klicken Sie auf das Plugin **SOFORT** und wählen dann **Konfiguration**.
3. Geben Sie den Konfigurationsschlüssel ein.  
	→ Diesen Schlüssel erhalten Sie durch den Registrierungsprozess.
4. Nehmen Sie weitere Einstellungen nach Bedarf im Reiter **Erweiterte Einstellungen** vor.
5. Sofern Sie eine automatisierte Rückzahlung (s.u.) einrichten möchten, tragen Sie im Reiter **Händlereinstellungen** Ihre Bankverbindung ein.
6. Speichern Sie die Einstellungen ab.

<table>
  <caption>Tab. 1: SOFORT-Plugineinstellungen / Grundeinstellungen</caption>
  <thead>
    <th>
      Einstellung
    </th>
    <th>
      Erläuterung
    </th>
  </thead>
  <tbody>
    <tr>
      <td>
        <b>Zahlungsart aktivieren</b>
      </td>
      <td><b>Standard:</b> <i>Nein</i>
      </td>
    </tr>
    <tr>
      <td>
        <b>Konfigurationsschlüssel</b>
      </td>
      <td><strong><i>Wichtig:</i></strong> Den Konfigurationsschlüssel erhalten Sie nach der Registrierung (https://www.sofort.com/payment/users/register). <br />Ohne Eingabe wird die Zahlungsart nicht aktiviert.
      </td>
    </tr>
  </tbody>
</table>

<table>
  <caption>Tab. 2: SOFORT-Plugineinstellungen / Erweiterte Einstellungen</caption>
  <thead>
    <th>
      Einstellung
    </th>
    <th>
      Erläuterung
    </th>
  </thead>
  <tbody>
    <tr>
      <td>
        <b>Logo (Größe)</b>
      </td>
      <td>
        Wählen Sie hier Ihre bevorzugte Größe des Logos aus. <strong><i><br />Wichtig: </i></strong>Die Darstellung im Frontend ist abhängig vom Template Plugin. Möglicherweise wird die geänderte Größe dabei nicht berücksichtigt.
        <br /><b>Standard:</b> <i>100x38</i>
      </td>
    </tr>
    <tr>
      <td>
        <b>Empfohlene Zahlungsart</b>
      </td>
      <td>
        Bei Aktivierung wird der Anzeigename durch den Zusatz "Empfohlene Zahlungsart" ergänzt.
        <br /><b>Standard:</b> <i>Ja</i>
      </td>
    </tr>
    <tr>
      <td>
        <b>Verwendungszweck (Zeile 1) *Pflichtangabe</b>
      </td>
      <td>
        Legt den Text fest, der als Verwendungszweck bei der Überweisung angegeben wird (max. 27 Zeichen - Sonderzeichen werden ersetzt/gelöscht). Folgende Platzhalter werden mit konkreten Werten ersetzt:<br />
        {{transaction_id}} => Transaktions-ID der Überweisung<br />
        {{customer_name}} => Name des Endkunden<br />
        {{customer_email}} => E-Mail Adresse des Endkunden<br />
        <b>Standard:</b> <i>{{transaction_id}}</i>
      </td>
    </tr>
    <tr>
      <td>
        <b>Verwendungszweck (Zeile 2)</b>
      </td>
      <td>
        <i>s. Verwendungszweck 1</i><br />
        Zusätzlich sind folgende Platzhalter möglich:<br />
        {{customer_id}} => Endkundennummer<br />
        {{customer_company}} => Firmenname des Endkunden<br />
        <b>Standard:</b> <i>-</i>
      </td>
    </tr>
  </tbody>
</table>

<table>
  <caption>Tab. 3: SOFORT-Plugineinstellungen / Händlereinstellungen</caption>
  <thead>
    <th>
      Einstellung
    </th>
    <th>
      Erläuterung
    </th>
  </thead>
  <tbody>
    <tr>
      <td>
        <b>Kontoinhaber</b>
      </td>
      <td>
        Händler Kontoinhaber
        <br /><b>Standard:</b> -
      </td>
    </tr>
    <tr>
      <td>
        <b>IBAN</b>
      </td>
      <td>
        Händler IBAN	
        <br /><b>Standard:</b> -
      </td>
    </tr>
    <tr>
      <td>
        <b>BIC</b>
      </td>
      <td>
        Händler BIC
        <br /><b>Standard:</b> -
      </td>
    </tr>
  </tbody>
</table>

## Zahlungsarten verwalten

In diesem Abschnitt erfahren Sie, wie Sie die Zahlungsart in Ihrem Webshop anbieten.

### SOFORT Überweisung aktivieren

Nachdem Sie das SOFORT-Plugin installiert haben, müssen Sie in der Konfiguration in der Grundeinstellung das Plugin aktivieren und mindestens den Konfigurationsschlüssel setzen.
Danach ist SOFORT Überweisung ohne weitere Einstellungen als Zahlungsart verfügbar. Diese Zahlungsart erscheint in der Kaufabwicklung je nach Priorität neben den anderen aktivierten Zahlungsarten.

## SOFORT-Zahlung automatisch zurückzahlen

Richten Sie eine Ereignisaktion ein, um die Rückzahlung einer Zahlung über SOFORT zu automatisieren.

##### Ereignisaktion einrichten:

1. Öffnen Sie das Menü **Plugins » Übersicht**.
2. Klicken Sie auf das Plugin **SOFORT** und wählen dann **Konfiguration**.
3. Tragen Sie im Reiter **Händlereinstellungen** Ihre Bankverbindung ein.
4. Öffnen Sie das Menü **Einstellungen » Aufträge » Ereignisaktionen**.
5. Klicken Sie auf **Ereignisaktion hinzufügen**.
→ Das Fenster **Neue Ereignisaktion erstellen** wird geöffnet.
6. Geben Sie einen Namen ein.
7. Wählen Sie das Ereignis gemäß Tabelle 4.
8. **Speichern** Sie die Einstellungen.
9. Nehmen Sie die Einstellungen gemäß Tabelle 4 vor.
10. Setzen Sie ein Häkchen bei **Aktiv**.
11. **Speichern** Sie die Einstellungen.

<table>
  <thead>
    <th>
      Einstellung
    </th>
    <th>
      Option
    </th>
    <th>
      Auswahl
    </th>
  </thead>
  <tbody>
    <tr>
      <td><strong>Ereignis</strong></td>
      <td><strong>Das Ereignis wählen, nach dem eine Rückzahlung erfolgen soll.</strong></td>
      <td></td>
    </tr>
    <tr>
      <td><strong>Filter 1</strong></td>
      <td><strong>Auftrag > Zahlungsart</strong></td>
      <td><strong>Plugin: SOFORT</strong></td>
    </tr>
    <tr>
      <td><strong>Aktion</strong></td>
      <td><strong>Plugin > Rückerstattung der SOFORT Überweisung</strong></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
  <caption>
    Tab. 4: Ereignisaktion zur automatischen Rückzahlung der SOFORT-Zahlung
  </caption>
</table>