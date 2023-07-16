
// import contract from "truffle-contract";
// import artifacts from "../../build/contracts/PropertiesContract.json";
App = {
    contracts: {},
    init: async () => {
        // console.log('loaded')
        await App.loadEthereum()
        await App.loadAccount()
        await App.loadContracts()
        App.render()
        await App.renderProperties()
    },

    loadEthereum: async () => {
        if (window.ethereum) {
            App.web3Provider = window.ethereum;
            await window.ethereum.request({ method: "eth_requestAccounts" });
        } else if (window.web3) {
            App.web3 = new Web3(window.web3.currentProvide)
        }
        else {
            console.log('no existe ethereum, intente descargando metamask')
        }
    },

    loadContracts: async () => {
        const res = await fetch('http://127.0.0.1:8000/build/contracts/PropertiesContract.json')
        const propertiesContractJSON = await res.json()

        App.contracts.propertiesContract = TruffleContract(propertiesContractJSON)

        App.contracts.propertiesContract.setProvider(App.web3Provider)

        App.propertiesContract = await App.contracts.propertiesContract.deployed()
    },

    loadAccount: async () => {
        const accounts = await window.ethereum.request({
            method: "eth_requestAccounts",
        });
        // console.log(accounts)
        App.account = accounts[0];
    },


    createProperty: async (_oldOwnerAndCedula, _newOwnerAndCedula, _price, _propertyId, _services, _superficie, _latitud, _longitud, _zona) => {
        const result = await App.propertiesContract.createPropertyContract(_oldOwnerAndCedula, _newOwnerAndCedula, _price,_propertyId, _services, _superficie, _latitud, _longitud, _zona, {
            from: App.account
        })
        console.log(result.logs[0].args)
    },

    render: () => {
        console.log(App.account)

    },

    renderProperties: async () => {
        const contador = await App.propertiesContract.propertiesCount(App.account)
        const propertyCount = contador.toNumber();
        App.contadorPropiedad = propertyCount;
        console.log(App.contadorPropiedad);
        // console.log(propertyCount)
        let html = '';
        for (let id = 0; id < propertyCount; id++) {
            const element = await App.propertiesContract.properties(App.account, id);
            // console.log(element[0].toNumber())
            // console.log(element[1])
            // console.log(element[2])
            // console.log(element[3])
            // console.log(element[4])
            // console.log(element[5])
            // console.log(element[6].toNumber())
            // console.log(element[7].toNumber())
            // console.log(element[8])
            // console.log(element[9])
            // console.log(element[10])
            const propertyId = element[0].toNumber()
            const propertyOldNombreCI = element[1]
            const propertyNewNombreCI = element[2]
            const propertyPrice = element[3]
            const propertyPropertyId = element[4]
            const propertyServices = element[5]
            const propertySuperficie = element[6].toNumber()
            const propertyCreateAt = element[7]
            const propertyLongitud = element[8]
            const propertyLatitud = element[9]
            const propertyAddress = element[10]

            let htmlElement = `
            <tr id="">
                <th scope="row">${propertyOldNombreCI}</th>
                <td>${propertySuperficie}</td>
                <td>${propertyPrice}</td>
                <td>${propertyNewNombreCI}</td>
                <td class="text-muted">
                     ${new Date(propertyCreateAt * 1000 ).toLocaleString()}
                </td>

                <td>
                    <a href="{{ url('/inmuebles/' . $inmueble->id . '/edit') }}"
                        class="btn btn-sm btn-danger">PDF</a>
                </td>
            </tr>

            `
            html += htmlElement
        }

        document.querySelector("#tproperty").innerHTML = html;
    },
    toggleDone: async (element) => {
        const propertyId = element.dataset.id;
        await App.propertiesContract.cambiarEstado(propertyId, {
          from: App.account,
        });
        window.location.reload();
      },
}

App.init()

{/* <td class="text-center align-middle">
<div class="form-check">
    <input class="form-check-input" data-id="${propertyId}" type="checkbox" ${propertyEstado === true && "checked"} onchange="App.toggleDone(this)" />
</div>
</td> */}
