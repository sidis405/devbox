#!/bin/bash



if [[ -n "$CURR_USER_ID" ]] && [[ -n "$CURR_GROUP_ID" ]]; then

    #groupadd -g $CURR_GROUP_ID defuser && echo "gruppo creato con successo" || exit 1
    #useradd -mu $CURR_USER_ID -g $CURR_GROUP_ID -s /bin/bash defuser && echo "utente creato con successo" || exit 1

    usermod -u $CURR_GROUP_ID www-data && echo "gruppo www-data modificato con successo" || exit 1
    groupmod -g $CURR_USER_ID www-data && echo "utente www-data modificato con successo" || exit 1

    passwd root << EOF
Docker!
Docker!
EOF


else
    echo "no default user detected!!!"
fi
