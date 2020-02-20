# Assistant vocal

1. main.py lance une boucle de détection vocale 
2. Ce qui est reconnu est écrit dans speech.txt 
3. speech.txt est interprété par main.php

## Prérequis
- Python 2.7.16
- PHP 7.3.11-1~deb10u1
- pico2wave
- Permissions sur le dossier

### Installation pico2wave
```bash
cd packages
sudo apt-get install -f ./libttspico-utils_1.0+git20130326-3+rpi1_armhf.deb ./libttspico0_1.0+git20130326-3+rpi1_armhf.deb
```

## Lancement
```bash
python main.py
```